#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(){
  setvbuf(stdout, NULL, _IONBF, 0);
  system("/bin/sh");
  return 0;
}
