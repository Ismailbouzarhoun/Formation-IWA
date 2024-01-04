import tkinter as tk
from tkinter import messagebox

fenetre = tk.Tk()
def messageBox():
    messagebox.showinfo("Information Iwa","ce message pour les etudiants de IWA")

btn = tk.Button(fenetre,text = "Cliquer ici !",command=messageBox)
btn.pack()
fenetre.mainloop()
