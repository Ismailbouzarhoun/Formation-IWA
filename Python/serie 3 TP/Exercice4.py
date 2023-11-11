
def compterMots(ch):
    liste = ch.split()
    dic_mots={}
    for mot in liste:
        if mot.lower() in dic_mots:
            dic_mots[mot]+=1
        else:
            dic_mots[mot]=1
    return dic_mots


sentence = "biba khawa and this is the life of the chaine de caractere and if i told"
compterMots(sentence)
print(compterMots(sentence))