import sys
import spacy

nlp=spacy.load('en_core_web_sm')
nlp2=spacy.load('C:\\xampp\\htdocs\\fyproj\\public\\Model\\NER-Model')
sentc=[]
lem=[]
stp=[]

input=sys.argv[1]

input=input.replace("_"," ")

doc = nlp(input)

#segmentation
for senc in doc.sents:
    sentc.append(senc)

#Stop word
for sen in sentc:
    s=""
    for word in sen:
        if not word.is_stop and not word.is_punct:
            s+= str(word)+" "
    stp.append(s)

#Lemmatize
for d in stp:
    doc=nlp(d)
    l=""
    for sen in doc:
        l += str(sen.lemma_)+" "
    lem.append(l)

ner=[]
doc2=nlp2(input)

for x in doc2.ents:
    for y in x.lemma_.split():
        ner.append(y)

for word in doc2.ents:
    print(word.lemma_)

for sen in sentc:
    for word in sen:
        if word.tag_=='NNP' or word.tag_=='NN':
            if word.lemma_ not in ner:
                #THIS*********
                print(word.lemma_)
