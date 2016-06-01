from scapy.all import *
import MySQLdb as mdb
con = mdb.connect('localhost','root','root','monitoring')
cur = con.cursor()
cur.execute ("SELECT * FROM router")
F = []
rows = cur.fetchall()
for g in rows:
	F.append(g)



t = 0.0
Z = []
Q = []
total = 0
for i in F:
	for p in range(4):
		print i[5]
		a,u = sr(IP(dst=i[5])/ICMP())
		tx = a[0][0].sent_time
		rx = a[0][1].time
		X = rx - tx
		Z.append(X)
		total += Z[p]
	Q.append(total)
	total = total/4

	koma3 = "{:.3f}".format


	print """
		delay packet 1    		  = %s ms
		delay packet 2 			  = %s ms
		delay packet 3 	        	  = %s ms
		delay packet 4 		          = %s ms""" %(koma3(Z[0]), koma3(Z[1]), koma3(Z[2]), koma3(Z[3]))
		



	f = abs(Z[1] - Z[0])
	g = abs(Z[2] - Z[1])
	h = abs(Z[3] - Z[2])

	l = ((f + g + h)/3*1000)

	with open("pa.txt", "a") as f:
		f.write("\n")
		f.write("%s" %i[5])
		f.write(" ")
		f.write("%s" %koma3(l))
		f.write(" ")
		f.write("%s" %koma3(total))	
	
#print f, g ,h

	
	print "Statistic from %s" %i[1]
	print "Inter-arrival Delay Average = %s ms" %koma3(total)
	print "Jitter = %s ms" %koma3(l)

