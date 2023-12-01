


def calculDePrix():
    nombreDePages=int(input("Combien de page pouvez vous imprimmer : "))
    if nombreDePages<=50:
        prixPaye=nombreDePages*0.13
        print("Total a paye est : ",prixPaye,"$")
    elif nombreDePages<=100:
        prixPaye=(50*0.13)+(nombreDePages-50)*0.10
        print("Total a paye est : ",prixPaye,"$")
    elif nombreDePages>=101:
        prixPaye=(50*0.13)+50*0.10+(nombreDePages-100)*0.08
        print("Total a paye est : ",prixPaye,"$")

calculDePrix()