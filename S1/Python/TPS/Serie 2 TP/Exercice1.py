ch = input("saisi une chaine de caractere : ")
while len(ch)<=2:
    ch = input("saisi une chaine de caractere : ")


print(len(ch))

first = ch[0]
last = ch[-1]
print(last)
ch = last + ch[1:-1] + first


print(ch)