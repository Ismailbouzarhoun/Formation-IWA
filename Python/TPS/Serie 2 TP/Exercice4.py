N = int(input("Entrer N : "))
for i in range(1,N+1):
    print(i,end="\t")
print("")
print("------------------------------------------------------------------------------")

for i in range(1,N+1):
    for j in range(1,N+1):
        print(i*j,end="\t")
    print("")

