hauteur = int(input("Entrer la hauteur de triange : "))


for i in range(hauteur):
    espaces = hauteur -i-1
    etoiles = 2*i+1
    print(espaces*" "+'*'*etoiles)



for i in range(hauteur):
    etoiles = (hauteur-i)*2-1
    print(i*" "+"*"*etoiles)