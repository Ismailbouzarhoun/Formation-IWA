from tkinter import *

fenetre = Tk()

lbl = Label(fenetre,text="Entrer l'age : ")
etr = Entry(fenetre,width=30)
txt1 = Message(fenetre)


def afficher():
    value = etr.get()
    txt1.config(text=value)
    

btn = Button(fenetre, text="Cliquer ici !", command=afficher)

lbl.pack(pady=5)
etr.pack(pady=10)
btn.pack()
txt1.pack()

fenetre.mainloop()