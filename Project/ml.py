from flask import Flask, render_template, request
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.naive_bayes import MultinomialNB
from sklearn.model_selection import train_test_split
from sklearn.metrics import classification_report
import mysql.connector

app = Flask(__name__)

@app.route('/skill')
def index():
    try:
        # Connect to the MySQL database
        connection = mysql.connector.connect(
            host="localhost",
            user="root",
            password="",
            database="studentinfo",
            charset="latin1"
        )

        if connection.is_connected():
            print("Connected to MySQL database")
        else:
            print("Failed to connect to MySQL database")

        # Load data from job/internship description table
        job_query = "SELECT role, skills_required FROM job_internship_description"
        job_data = pd.read_sql(job_query, connection)

        # Load data from student table
        student_query = "SELECT skill FROM studentform"
        student_data = pd.read_sql(student_query, connection)

        if not student_data.empty:
            # Preprocess data (if needed)

            # Feature extraction using TF-IDF
            vectorizer = TfidfVectorizer()
            X_job = vectorizer.fit_transform(job_data['skills_required'])
            y_job = job_data['role']

            X_student = vectorizer.transform(student_data['skill'])

            # Split data into training and testing sets
            X_train, X_test, y_train, y_test = train_test_split(X_job, y_job, test_size=0.2, random_state=42)

            # Train a classification model
            model = MultinomialNB()
            model.fit(X_train, y_train)

            # Evaluate the model
            y_pred = model.predict(X_test)
            classification_result = classification_report(y_test, y_pred)

            # Predict roles based on student skills
            predicted_roles = model.predict(X_student)
            student_data['predicted_role'] = predicted_roles

            # Output matching students
            matching_students = student_data.to_dict('records')

            return render_template('skillmatch.html', matching_students=matching_students, classification_result=classification_result)
        else:
            return "No data found in student table"
    except mysql.connector.Error as error:
        return f"Error connecting to MySQL database: {error}"
    finally:
        # Close the database connection
        if 'connection' in locals() and connection.is_connected():
            connection.close()
            print("MySQL database connection closed")

if __name__ == '__main__':
    app.run(debug=True)
