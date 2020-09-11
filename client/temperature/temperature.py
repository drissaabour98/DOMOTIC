#!/usr/bin/env python

import sqlite3
import RPi.GPIO as GPIO
import	os
import time
import glob
import random

#variables globals
speriod=1.5
dbname='/www/tembase.db'


#fonction d aquisition de temperature
def get_temp():
	f=open("/home/pi/embedded_soft/python/python_bd/text.txt","w");
	x = random.uniform(20, 30.5)
	f.write(str(x))
	f.close()
	#open and read the file after the appending:
	f = open("/home/pi/embedded_soft/python/python_bd/text.txt", "r")
 	a = f.readline()
	return  float(a[0:5])
		
#focntion de stockage de temperature dans la bd
def log_temperature(temp):
	conn=sqlite3.connect(dbname)
	curs=conn.cursor()
	curs.execute("INSERT INTO temps values(datetime('now') , (?))",(temp,))
	conn.commit()
	conn.close()
	
#afficher la database
def display_data():
	conn=sqlite3.connect(dbname)
	curs=conn.cursor()
	for row in curs.execute("select * from temps ORDER BY rowid DESC LIMIT 1"):
		print "last value "+str(row[0]) + "  .. " +str(row[1])
	
	conn.close()
#fonction principale
def main():
		
		temperature=get_temp()
		if temperature ==None:
			temperature = get_temp()
			print	"temperature = "+str(temperature)
		else:
			
			print	"temperature = "+str(temperature)
			
	#enregistrer dans db
		log_temperature(temperature)
	#affichage
		display_data()
	
		
if __name__ == '__main__':
	main()

