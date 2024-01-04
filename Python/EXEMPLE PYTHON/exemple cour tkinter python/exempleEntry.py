from tkinter import *

fenetre = Tk()

lbl = Label(fenetre,text="Entrer l'age : ")
etr = Entry(fenetre,bd=5)
lbl.pack(side=LEFT)
etr.pack(side=RIGHT)

fenetre.mainloop()