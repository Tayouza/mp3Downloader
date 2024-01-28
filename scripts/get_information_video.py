from pytube import YouTube
import re
import os

def remove_special_chars(input_str):
    return re.sub('[^A-Za-z0-9 ]+', '', input_str)

link = os.sys.argv[1]
yt = YouTube(link)
ys = yt.streams.first() 
title = remove_special_chars(ys.title)
resolutions = list(set(stream.resolution for stream in yt.streams))
resolutions = ','.join(resolutions)

print(yt.thumbnail_url + ',' + title + ',[' + resolutions + ']')