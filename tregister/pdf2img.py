import glob, sys, fitz

#for i in range(1, len(sys.argv)):
#    print('argument:', i, 'value:', sys.argv[i])

folder=sys.argv[1]
fileName=sys.argv[2]
fileAlias=sys.argv[3]

# To get better resolution
zoom_x = 2.0  # horizontal zoom
zoom_y = 2.0  # vertical zoom
mat = fitz.Matrix(zoom_x, zoom_y)  # zoom factor 2 in each dimension

path = '../uploads/'+str(folder)+"/"+fileName;
all_files = glob.glob(path)

for filename in all_files:

    doc = fitz.open(filename)  # open document
    print(filename)
    for page in doc:  # iterate through the pages
        
        pix = page.get_pixmap(matrix=mat)  # render page to an image
        pix.save("../uploads/"+str(folder)+"/"+fileAlias+".png")  # store image as a PNG
