from Crypto.Util.number import inverse, long_to_bytes, getPrime, bytes_to_long

p = getPrime(1024)
q = getPrime(1024)

print('p=',hex(p).replace('6b','8c').replace('cc','43').replace('51','9f').replace('14','d8'))

flag = bytes_to_long(b'flag{xxxxxxxxxxxxx}')
n = p * q
e = 65537
print('n=',hex(n))
print()
print('c=',hex(pow(flag,e,n)))






