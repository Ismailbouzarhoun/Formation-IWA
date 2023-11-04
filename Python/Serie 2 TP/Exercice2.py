ch = input("ecrire votre chaine de caractere : ")
b=0
for i in range(len(ch)):
    if ch[i] == "p":
        print("la lettre 'p' se trouve dans la position",i)