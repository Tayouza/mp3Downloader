from pytube import YouTube
import os

link = os.sys.argv[1]
yt = YouTube(link)

print(yt.thumbnail_url)