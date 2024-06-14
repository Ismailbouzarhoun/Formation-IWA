from tkinter import *
from tkinter import font

fenetre = Tk()
police = font.Font(size=15,slant='italic')
txt1 = Text(fenetre, height=10, width=50)
txt1.insert(INSERT, "Hello iwa")
txt2 = Text(fenetre, height=10, width=50)

def buttonclick():
    text_from_txt1 = txt1.get("1.0", END)
    txt2.delete("1.0", END)
    txt2.insert(INSERT, text_from_txt1)
    txt1.delete("1.0", END)

btn = Button(fenetre, text="Cliquer ici !", command=buttonclick)

txt1.pack(pady=10)
btn.pack(pady=10)
txt2.pack(pady=10)
fenetre.mainloop()
