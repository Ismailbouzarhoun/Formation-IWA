import tkinter as tk
from tkinter import *

def onClickButton():
    lbl.config(text = "Le Button a ete Cliquer")



fenetre = Tk()
lbl = Label(fenetre,text="Cliquer sur e button !")
btn = Button(fenetre,text="Cliquer moi",bg='red',command=onClickButton)



lbl.pack()
btn.pack()
fenetre.mainloop()
