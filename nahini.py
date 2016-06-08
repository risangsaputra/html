from scapy.all import *
import MySQLdb as mdb
import time
con = mdb.connect('localhost','root','root','monitoring')
cur = con.cursor()
cur.execute ("SELECT * FROM router")
F = []
rows = cur.fetchall()
for g in rows:
	F.append(g)

#def execute():
#	time.sleep(60)

t = 0.0
Z = []
Q = []
total = 0
#while True:
#	execute()
for i in F:
	for p in range(4):
		a,u = sr(IP(dst=i[5])/ICMP(), verbose = 0)
		print "send packet %s" %(p+1)
		tx = a[0][0].sent_time
		rx = a[0][1].time
		X = rx - tx
		Z.append(X)
		total += Z[p]
		total = total/4
		koma3 = "{:.8f}".format
		print "Done"
	print """
			delay packet 1    		  = %s ms
			delay packet 2 			  = %s ms
			delay packet 3 	        	  = %s ms
			delay packet 4 		          = %s ms""" %(Z[0],Z[1],Z[2],Z[3])
	rata=abs(Z[0]+Z[1]+Z[2]+Z[3])
	f = abs(Z[1] - Z[0])
	g = abs(Z[2] - Z[1])
	h = abs(Z[3] - Z[2])

	l = ((f + g + h)/3)
	print "rata %s" %rata
	print "Statistic from %s" %i[5]
	print "Inter-arrival Delay Average = %s ms" %koma3(total)
	print "Jitter = %s ms" %koma3(l)
	with open("pa.txt", "a") as f:
                f.write("\n")
                f.write("%s" %i[5])
                f.write(" ")
                f.write("%s" %koma3(l))
                f.write(" ")
                f.write("%s" %koma3(total))

	for m in range (4):
			Z.pop(-1)
