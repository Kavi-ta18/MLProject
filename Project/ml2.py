import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.naive_bayes import MultinomialNB
from sklearn.model_selection import train_test_split
from sklearn.metrics import classification_report
import mysql.connector

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

    if not student_data.empty and not job_data.empty:
        # Preprocess data (if needed)

        # Feature extraction using TF-IDF
        vectorizer = TfidfVectorizer()
        X_job = vectorizer.fit_transform(job_data['skills_required'])
        y_job = job_data['role']

        X_student = vectorizer.transform(student_data['skill'])

        # Split data into training and testing sets (not applicable without expected roles)
        # Train a classification model
        model = MultinomialNB()
        model.fit(X_job, y_job)

        # Predict roles based on student skills
        predicted_roles = model.predict(X_student)
        student_data['predicted_role'] = predicted_roles

        # Output predicted roles for students
        print("Predicted Roles for Students:")
        print(student_data)
    else:
        print("No data found in student or job_internship_description table")
except mysql.connector.Error as error:
    print("Error connecting to MySQL database:", error)
finally:
    # Close the database connection
    if 'connection' in locals() and connection.is_connected():
        connection.close()
        print("MySQL database connection closed")
