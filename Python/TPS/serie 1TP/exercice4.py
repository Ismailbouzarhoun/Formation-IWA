a=int(input("Entrer le premier nombre : "))
b=int(input("Entrer la deuxieme nombre : "))
oper=input("ecrire une operation : ")

if(oper=="+"):
    s=a+b
    print(s)
elif(oper=="-"):
    s=a-b
    print(s)
elif(oper=="*"):
    s=a*b
    print(s)
elif(oper=="/"):
    if(b==0):
        print("la division sur 0 est impossible.")
    else:
        s=a/b
        print(s)
else:
    print("pardon cette operation n'existe pas entrer une opertion entre c'est quatre +,-,*,/.")