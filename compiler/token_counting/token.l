
/*Lex code to count total number of tokens */

%{
#include<stdio.h>
int n = 0 ;
%}

%%
"while"|"if"|"else" {printf("\t keywords : %s", yytext); n++;}
  "int"|"float" {printf("\t keywords : %s", yytext);n++;}


[a-zA-Z_][a-zA-Z0-9_]* {printf("\t identifier : %s", yytext); n++;}


"<="|"=="|"="|"++"|"-"|"*"|"+" {printf("\t operator : %s", yytext); n++;}


[(){}|, ;]    {printf("\t separator : %s", yytext); n++;}


[0-9]*"."[0-9]+ {printf("\t float : %s", yytext); n++;}
[0-9]+ {printf("\t integer : %s", yytext); n++;
printf("\n total no. of token = %d\n", n);
}
%%
int yywrap()
{
  return 0;
}
main()
{
yylex();
}
