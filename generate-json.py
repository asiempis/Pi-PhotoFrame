import os, sys
import json
import datetime

#Folder Modification Date
def modification_date(filename):
    t = os.path.getmtime(filename)
    return datetime.datetime.fromtimestamp(t)
	
#Count only photos in directory
def count_photos(filename):
	dirs = os.listdir( filename )
	file_count = 0
	for names in dirs:
		if names.endswith(".jpg") or names.endswith(".jpeg") or names.endswith(".png"):
			file_count += 1
	return file_count

	
#Filename	
file = "test"

mod_datetime = modification_date(file)
mod_date = mod_datetime.date()
count = count_photos(file)

#with open(images, 'wb') as outfile:
#	json.dump(row, outfile)