import sys
import spacy
from spacy.util import minibatch, compounding


output_dir="C:\\xampp\\htdocs\\fyproj\\public\\Model\\Classify"
input=sys.argv[1]

input=input.replace("_"," ")

nlp = spacy.load(output_dir)
doc = nlp(input)

n=doc.cats['POSITIVE']-doc.cats['NEGATIVE']

if n >= 0:
    print(1)
else:
    print(0)
    
#i am really bad on programming
#i am good on programming