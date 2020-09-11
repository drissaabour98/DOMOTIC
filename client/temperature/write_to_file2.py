#!/usr/bin/env python

import sqlite3
import sys
dbname='/www/tembase.db'
seuil = int(sys.argv[1])
conn=sqlite3.connect(dbname)
curs=conn.cursor()
curs.execute("INSERT INTO etat values ((?))",(seuil,))
conn.commit()
conn.close()
