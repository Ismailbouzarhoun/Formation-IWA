# my_dict = {1: 'a', 2: 'b', 3: 'c',4: 'd', 5: 'e', 6: 'f',7: 'j', 8: 'h', 9: 'i',10: 'g', 11: 'k', 12: 'l',13: 'm', 14: 'n', 15: 'o',16: 'p', 17: 'k', 18: 'r',19: 's', 20: 't', 21: 'u',22: 'v', 23: 'w', 24: 'x', 25: 'y', 26: 'z'}

liste = ["T","O","A","p","t","p","l","o","e","s","t","t","r","s","t","t","t","u","m","m","p"]


liste_sans_elt_pairs=[]

for i in range(len(liste)):
    if i%2!=0:
        liste_sans_elt_pairs.append(liste[i])

liste_sans_elt_t=[]
for elt in liste_sans_elt_pairs:
    if elt !='t' and elt!='T':
        liste_sans_elt_t.append(elt)

print(liste_sans_elt_pairs)
print(liste_sans_elt_t)