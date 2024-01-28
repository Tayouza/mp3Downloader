from pytube import YouTube
import re
import os

def remove_special_chars(input_str):
    return re.sub('[^A-Za-z0-9 ]+', '', input_str)

link = os.sys.argv[1]
path = os.sys.argv[2]
yt = YouTube(link)

ys = yt.streams.first() 
title = remove_special_chars(ys.title)
ys.download(output_path = path,filename = title + '.mp4')

print('mp4/' + title + '.mp4')