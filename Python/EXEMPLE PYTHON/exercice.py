def saisir():
    n = int(input("Entrer la valeur de n :"))
    p = int(input("Entrer la valeur de p :"))
    while(p>=n):
        print("La valeur doit etre inferieur a n")
        n = int(input("Entrer la valeur de n :"))
        p = int(input("Entrer la valeur de p :"))
    return n,p

def fact(n):
    fac = 1
    for i in range(1,n):
        fac*=i+1
    return fac
n,p = saisir()

def calculer(n,p):
    cmp = fact(n)/(fact(p)*fact(n-p))
    return cmp
print("cmp",calculer(n,p))
