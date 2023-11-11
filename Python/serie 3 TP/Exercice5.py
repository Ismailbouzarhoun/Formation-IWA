chaine = "Hello and welcome to our life"
def getNbrApp(elt):
    return elt[0]

liste_caracteres=set(chaine)
dic_caractere = {}

for caractere in liste_caracteres:
    dic_caractere[caractere]=chaine.count(caractere)

liste=[]
for caractere,nbrApri in dic_caractere.items():
    liste.append((caractere,nbrApri))

liste.sort(key=getNbrApp,reverse=True)

print(liste)