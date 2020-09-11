#include <stdio.h>
#include <errno.h>
#include <string.h>
#include <wiringPi.h>
#include <softServo.h>
int main (int argc , char ** argv)
{
int ON_OFF = atoi(argv[1]) ;
  
  softServoSetup (0,1,2,3,4,5,6,7) ;
switch(ON_OFF)
	{
		case 0:
			softServoWrite (7,  1500) ;
			break ;

		case 1:
			 softServoWrite (7, 2000 ) ;
			break ;

		default:
			printf("errrrrreur") ;
			return 1  ;
	}






}
