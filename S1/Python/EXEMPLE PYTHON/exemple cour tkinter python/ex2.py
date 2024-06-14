import tkinter as tk

fenetre = tk.Tk()
var = tk.StringVar()
lbl = tk.Label(fenetre,textvariable=var)

var.set("Bonjour IWA")
lbl.pack()
fenetre.mainloop()
