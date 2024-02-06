# populate_database.py

from faker import Faker
import mysql.connector
import random

# Faker kütüphanesini başlat
fake = Faker()

# MySQL veritabanına bağlan
conn = mysql.connector.connect(
    host='localhost',
    user='canciftcioglu',
    password='Cancan2468.',
    database='database_Linkedin'
)
cursor = conn.cursor()

# Sahte veri üreten fonksiyonlar
def create_fake_user():
    first_name = fake.first_name()
    last_name = fake.last_name()
    password = fake.password()
    
    users = {
        'id': None,  # Bu satırı ekledik
        'first_name': first_name,
        'last_name': last_name,
        'password': password,
    }
    return users
    
def create_fake_experience(user_id):
    start_date = fake.date_between(start_date='-5y', end_date='today')
    end_date = fake.date_between(start_date=start_date, end_date='today')
    position = fake.job()
    company = fake.company()
    
    # Diğer deneyim verilerini oluşturun
    experience = {
        'user_id': user_id,
        'start_date': start_date,
        'end_date': end_date,
        'position': position,
        'company': company,
    }
    return experience


for _ in range(1000000):
    user = create_fake_user()
    cursor.execute('INSERT INTO users (id, first_name, last_name, password) VALUES (%s, %s, %s, %s)',
                   (user['id'], user['first_name'], user['last_name'], user['password']))
    user_id = cursor.lastrowid  # Eklenen kullanıcının ID'sini alın
    experience = create_fake_experience(user_id)
    
    cursor.execute('INSERT INTO experience (id, start, end, user, position, company) VALUES (%s, %s, %s, %s, %s, %s)',
                   (experience['id'], experience['start'], experience['end'], user_id, experience['position'], experience['company']))
    conn.commit()


# Bağlantıyı kapat
cursor.close()
conn.close()
