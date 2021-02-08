import sys
import math
import numpy
vocab=[]
wordDict=[]


course = sys.argv[1] #'kk00101,kk00102,kk00103,kk00104'
flist = course.split(',')


keyword = sys.argv[2] #'a,b,c,d.d,e,f.g,h,i.i,a,k,l'
rows = keyword.replace("_"," ")
rows = rows.split('.')
kw = [row.split(',') for row in rows]


query = sys.argv[3] #'a,b,d,f,g'
q = query.replace("_"," ")
q = q.split(',')


cn=0
while(cn<len(flist)):
    doc=kw[cn]
    vocab = set(vocab).union(doc)
    cn+=1

vocab = list(vocab)


l=0
while l<len(flist):
    wordDict.append([])
    wordDict[l] = dict.fromkeys(vocab, 0)
    l+=1
    
#calculate N
count=0
while count<len(flist):
    doc=kw[count]
    for word in doc:
        wordDict[count][word]+=1
    count+=1

###
voc=[]
for v in vocab:
    voc.append(v)

#calculate Tf
num=0
tf=[]
while num<len(flist):
    x=0
    tf.append([])
    while x<len(voc):
        if(wordDict[num][voc[x]]>0):
            tf[num].append(round(1+math.log2(wordDict[num][voc[x]]),3))
        else:
            tf[num].append(0)
        x+=1
    num+=1


#calculate Idf
num=0
ni=[0]*len(voc)
idf=[0]*len(voc)
while num<len(flist):
    x=0
    while x<len(voc):
        if(tf[num][x]>0):
            ni[x]+=1
        x+=1
    num+=1

num=0
while num<len(flist):
    x=0
    while x<len(voc):
        if(tf[num][x]>0):
            idf[x]=round(math.log2(len(flist)/ni[x]),3)
        x+=1
    num+=1


#calculate Tf-Idf
num=0
tfIdf=[]
while num<len(flist):
    x=0
    tfIdf.append([])
    while x<len(voc):
        tfIdf[num].append(round(tf[num][x]*idf[x],3))
        x+=1
    num+=1


qVoc=[]
qVoc = set(qVoc).union(q)

qDict = dict.fromkeys(qVoc, 0)
for word in q:
    qDict[word]+=1
        


dRank=[]
r=0
while r < len(flist):
    sum=0.0
    vNorm2=0.0
    vq2=[]
    for x in qVoc:
        if x in vocab:
            sum += float(1+math.log2(qDict[x]))*float(idf[vocab.index(x)])*float(tfIdf[r][vocab.index(x)])
            vq2.append(float(1+math.log2(qDict[x]))*float(idf[vocab.index(x)]))

    for x in vocab:
        vNorm2 += float(tfIdf[r][vocab.index(x)])**2
    
    if (vNorm2==0):
        dRank.append(0)
    else:
        tot=0.0
        i=0
        while i<len(vq2):
            tot+= vq2[i]**2
            i+=1

        dRank.append(sum/(math.sqrt(tot)*math.sqrt(vNorm2)))
        
    r+=1

final=dRank.copy()
s=numpy.array(final)

sort_index = numpy.argsort(s)

for i in range(1,5):
    print(flist[sort_index[-i]])
    print("(Score: ",round(final[sort_index[-i]]*5, 2),"}")

