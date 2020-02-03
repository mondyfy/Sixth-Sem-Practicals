/* Definition Section
This count variable can be accessed inside yylex() i.e. User code section */
%{
int count = 0;
%}

/*
Rules Section
 */
%%
[A-Z] {
       printf("%s capital letter\n", yytext); /* matches with capital letters */
       count++;
     }
.     {
        printf("%s not a capital letter\n", yytext); /* matches with any character except newline */
      }
\n    {
        return 0; /* does not take input after the enter*/
      }
      /* yytext is the text in the buffer  */
%%

/*Code section*/
int yywrap(){} /* wraps the rule section */
int main(){
            printf("Please enter a string:");
            yylex();  /* main flex function which runs the Rule Section*/
            printf("\n Number of Captial letters in the given input - %d\n", count);
            return 0;
          }
