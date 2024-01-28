from pytube import YouTube
from moviepy.editor import VideoFileClip
import re
import os

link = os.sys.argv[1]
path = os.sys.argv[2]
yt = YouTube(link)

ys = yt.streams.first().download(path)

try:
    for file in os.listdir(path):
        if re.search('mp4',file):
            mp4_path = os.path.join(path, file)
            mp3_path = os.path.join(path, os.path.splitext (file)[0]+'.mp3')
            video = VideoFileClip(mp4_path)
            audio = video.audio
            audio.write_audiofile(mp3_path)
            os.remove(mp4_path)
    file_path = mp3_path.replace(path,'')
    print('mp3/' + file_path)
except:
    print('Error')