def gcd(a, b):   
    if a < b:
        a, b = b, a
    while b != 0:
        temp = a % b
        a = b
        b = temp
    return a

n1 = int(input('n1:'),16)
n2 = int(input('n2:'),16)

#n1=p1*q n2=p2*q
q = gcd(n1,n2)
p1 = n1//q
p2 = n2//q
print('q:',q)
print('p1')