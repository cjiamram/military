import glob, sys, fitz

# To get better resolution
zoom_x = 2.0  # horizontal zoom
zoom_y = 2.0  # vertical zoom
mat = fitz.Matrix(zoom_x, zoom_y)  # zoom factor 2 in each dimension

path = 'in/'
all_files = glob.glob(path + "T.pdf")

for filename in all_files:

    doc = fitz.open(filename)  # open document
    print(filename)
    for page in doc:  # iterate through the pages
        
        pix = page.get_pixmap(matrix=mat)  # render page to an image
        pix.save("out/page-%i.png" % page.number)  # store image as a PNG
