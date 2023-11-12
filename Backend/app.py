# app.py

from flask import Flask, jsonify
from db_config import get_connection

app = Flask(__name__)

# Ruta para obtener todas las herramientas
@app.route('/tools', methods=['GET'])
def get_tools():
    connection = get_connection()

    if connection:
        cursor = connection.cursor(dictionary=True)
        cursor.execute('SELECT * FROM Tools')
        tools = cursor.fetchall()

        tools_list = []
        for tool in tools:
            tools_list.append(tool)

        connection.close()

        return jsonify({'tools': tools_list})
    else:
        return jsonify({'message': 'Error al conectar a la base de datos'}), 500

# Otras rutas y código aquí

if __name__ == '__main__':
    app.run(debug=True)
