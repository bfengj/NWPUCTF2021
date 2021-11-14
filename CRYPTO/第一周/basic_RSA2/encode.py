import subprocess
from Crypto.Util.number import inverse, long_to_bytes, getPrime, bytes_to_long

p = getPrime(1024)
q = getPrime(1024)

print('p=',hex(p).replace('ab','1c'))
print('q=',hex(q).replace('ab','1c'))

flag = bytes_to_long(b'flag{xxxxxxxxxxxxxxxxx}')
n = p * q
e = 65537
print('n=',hex(n))
print()
print('c=',hex(pow(flag,e,n)))






