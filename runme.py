import requests
import json
import os
import tkinter as tk
from tkinter import messagebox
from PIL import Image, ImageTk
from io import BytesIO

r = requests.get('https://dog.ceo/api/breeds/image/random')
##print(f'{r.text}') 
data = r.json()
response = f'{data["message"]}'
imagem=requests.get(response)
image = Image.open(BytesIO(imagem.content))
image.save('doglol.jpg')

root=tk.Tk()
root.title('dogkkkkkkkkkk')
tkimage= ImageTk.PhotoImage(image)
width, height = image.size
root.geometry(f'{width}x{height}')
label=tk.Label(root, image=tkimage)
label.pack(pady=20)
root.mainloop()