# print-divs.py

def printDivs(num):
	for i in range(num):
		print('<div class="item">Item ' + str(i+1) + ': Lorem ipsum dolor sic amet</div>')

printDivs(20)