import serial
import re
import mysql.connector


ARDUINO = "COM3"

def bpm():
    ser = serial.Serial (ARDUINO, timeout=1)
    prevVal = None
    Liste= []
    i = 0
    while i !=20:
        i+=1
        print(i,"secondes")
        ser.flushInput()
        serialValue = ser.readline().strip()
        if serialValue != prevVal:
            if str(serialValue) != "b''":
                print(serialValue)
                Liste.append(int(serialValue))
                prevVal = serialValue
    con= mysql.connector.connect(host='127.0.0.1 ',database='test',user='root',password='')
    cursor=con.cursor()
    req='SELECT * FROM bpm'
    cursor.execute(req)
    tableau=cursor.fetchall()
    for i in range(len(Liste)-1):
        sql= f'INSERT INTO `bpm` (`bpm`) VALUES ({Liste[i]})'
        cursor.execute(sql)
        con.commit()

    print(Liste)



bpm()