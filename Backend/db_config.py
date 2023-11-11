# db_config.py

import mysql.connector

def get_connection():
    host = 'localhost'
    database = 'api_nighs'
    user = 'root'
    password = ''

    try:
        connection = mysql.connector.connect(
            host='localhost',
            database='api_nighs',
            user='root',
            password=''
        )
        return connection

    except mysql.connector.Error as err:
        print(f"Error al conectar a la base de datos: {err}")
        return None
