
%{
	#include<stdio.h>
%}

%%
[A-Z] {printf("uppercase \t");}
[a-z] {printf("lowercase  \t");}
%%
int yywrap()
{
return 0;
}
int main()
{
printf("enter a string");
yylex();
	
}