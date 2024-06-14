list = [12,34,3,1,7,8,5,4]

def afficher_list(list):
    print(list)

def afficher_en_colonne(list):
    n=len(list)
    for i in range(n):
        print(i,":",list[i])

def somme_list(list):
    some = 0
    for i in list:
        some+=i
    print(some)

def multiple_liste(list):
    nv_liste=[]
    for i in list:
        nv_liste.append(i)
    print(nv_liste)

def plus_grand_nombre(list):
    maximum=max(list)
    print("Le plus petit nombre dans la liste est : ",maximum)

def plus_petit_nombre(list):
    minimum = min(list)
    print("Le plus petit nombre dans la liste est : ",minimum)

def compter_nombres_pairs(list):
    compt=0
    for i in list:
        if(i%2==0):
            compt+=1
    print("Le nombre des valeur paires dans la liste est : ",compt)

def somme_nombres_impaires(list):
    somme=0
    for i in list:
        if(i%2!=0):
            somme+=i
    print("La somme des nombres impaires dans la list est : ",somme)

afficher_list(list)
afficher_en_colonne(list)
somme_list(list)
multiple_liste(list)
plus_grand_nombre(list)
plus_petit_nombre(list)
compter_nombres_pairs(list)
somme_nombres_impaires(list)