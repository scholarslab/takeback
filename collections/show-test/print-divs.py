# print-divs.py

def printDivs(num):
	for i in range(num):
		print('<div class="slide">Item ' + str(i+1) + '</div>')

printDivs(50)