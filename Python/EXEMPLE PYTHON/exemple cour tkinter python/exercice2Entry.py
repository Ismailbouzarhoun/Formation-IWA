from tkinter import *


def afficher_langue():
    if casevar1.get():
        lbl.config(text="Les language selectionnees :"+"Python")
    if casevar2.get():
        lbl.config(text="Les language selectionnees :"+"Java")
    if casevar3.get():
        lbl.config(text="Les language selectionnees :"+"Javascript")
    if casevar4.get():
        lbl.config(text="Les language selectionnees :"+"C++")

def quiter():
    txt1.config()
    
fenetre=Tk()

casevar1 = BooleanVar()
casevar2 = BooleanVar()
casevar3 = BooleanVar()
casevar4 = BooleanVar()

case1 = Checkbutton(fenetre, text="Python",width=10,height=2,variable=casevar1,command=afficher_langue)
case2 = Checkbutton(fenetre, text="Java",width=10,height=2,variable=casevar2,command=afficher_langue)
case3 = Checkbutton(fenetre, text="JavaScript",width=10,height=2,variable=casevar3,command=afficher_langue)
case4 = Checkbutton(fenetre, text="c++",width=10,height=2,variable=casevar3,command=afficher_langue)
lbl = Label(fenetre,text="Les language selectione")
btn = Button(fenetre, text="quiter", command=quiter)
txt1 = Message(fenetre)


case1.pack(anchor=W)
case2.pack(anchor=W)
case3.pack(anchor=W)
case4.pack(anchor=W)
lbl.pack()
txt1.pack()
btn.pack()
fenetre.mainloop()