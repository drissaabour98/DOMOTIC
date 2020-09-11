import RPi.GPIO as GPIO
import time 


#!/usr/bin/env python

import sqlite3

import	os
import time
import glob
import random

#variables globals

dbname='/www/tembase.db'


#fonction d aquisition de temperature
def decision(a,b):
	if (a>b):
		print("led ON  la temperature actuel est ",a," seuil est ",b,".");
	   	#os.system("cd /www/b-bin/ && sudo ./web_led 0 1")
	else :
		print("led OFF la temperature actuel est ",a," seuil est ",b,".");
		#os.system("cd /www/b-bin/ && sudo ./web_led 0 0")			
	 
		

	
#afficher la database
def data_base():
	conn=sqlite3.connect(dbname)
	curs=conn.cursor()
	for row in curs.execute("select * from temps ORDER BY rowid DESC LIMIT 1"):
		temperature= float( str(row[1]) )	
	conn.close()
	conn=sqlite3.connect(dbname)
	curs=conn.cursor()
	for row in curs.execute("select * from SEUIL ORDER BY rowid DESC LIMIT 1"):
		seuil= float( str(row[0]) )	
	conn.close()
	return temperature,seuil;
	
#fonction principale
def main():
	a,b=data_base()
	decision(a,b)
		
if __name__ == '__main__':
	main()

