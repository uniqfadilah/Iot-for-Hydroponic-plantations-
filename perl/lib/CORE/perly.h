/* -*- buffer-read-only: t -*-
   !!!!!!!   DO NOT EDIT THIS FILE   !!!!!!!
   This file is built by regen_perly.pl from perly.y.
   Any changes made here will be lost!
 */

#define PERL_BISON_VERSION  30003

#ifdef PERL_CORE
/* A Bison parser, made by GNU Bison 3.3.2.  */

/* Bison interface for Yacc-like parsers in C

   Copyright (C) 1984, 1989-1990, 2000-2015, 2018-2019 Free Software Foundation,
   Inc.

   This program is free software: you can redistribute it and/or modify
   it under the terms of the GNU General Public License as published by
   the Free Software Foundation, either version 3 of the License, or
   (at your option) any later version.

   This program is distributed in the hope that it will be useful,
   but WITHOUT ANY WARRANTY; without even the implied warranty of
   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   GNU General Public License for more details.

   You should have received a copy of the GNU General Public License
   along with this program.  If not, see <http://www.gnu.org/licenses/>.  */

/* As a special exception, you may create a larger work that contains
   part or all of the Bison parser skeleton and distribute that work
   under terms of your choice, so long as that work isn't itself a
   parser generator using the skeleton or a modified version thereof
   as a parser skeleton.  Alternatively, if you modify or redistribute
   the parser skeleton itself, you may (at your option) remove this
   special exception, which will cause the skeleton and the resulting
   Bison output files to be licensed under the GNU General Public
   License without this special exception.

   This special exception was added by the Free Software Foundation in
   version 2.2 of Bison.  */

/* Undocumented macros, especially those whose name start with YY_,
   are private implementation details.  Do not rely on them.  */

/* Debug traces.  */
#ifndef YYDEBUG
# define YYDEBUG 0
#endif
#if YYDEBUG
extern int yydebug;
#endif

/* Token type.  */
#ifndef YYTOKENTYPE
# define YYTOKENTYPE
  enum yytokentype
  {
    GRAMPROG = 258,
    GRAMEXPR = 259,
    GRAMBLOCK = 260,
    GRAMBARESTMT = 261,
    GRAMFULLSTMT = 262,
    GRAMSTMTSEQ = 263,
    GRAMSUBSIGNATURE = 264,
    BAREWORD = 265,
    METHOD = 266,
    FUNCMETH = 267,
    THING = 268,
    PMFUNC = 269,
    PRIVATEREF = 270,
    QWLIST = 271,
    FUNC0OP = 272,
    FUNC0SUB = 273,
    UNIOPSUB = 274,
    LSTOPSUB = 275,
    PLUGEXPR = 276,
    PLUGSTMT = 277,
    LABEL = 278,
    FORMAT = 279,
    SUB = 280,
    SIGSUB = 281,
    ANONSUB = 282,
    ANON_SIGSUB = 283,
    PACKAGE = 284,
    USE = 285,
    WHILE = 286,
    UNTIL = 287,
    IF = 288,
    UNLESS = 289,
    ELSE = 290,
    ELSIF = 291,
    CONTINUE = 292,
    FOR = 293,
    GIVEN = 294,
    WHEN = 295,
    DEFAULT = 296,
    LOOPEX = 297,
    DOTDOT = 298,
    YADAYADA = 299,
    FUNC0 = 300,
    FUNC1 = 301,
    FUNC = 302,
    UNIOP = 303,
    LSTOP = 304,
    MULOP = 305,
    ADDOP = 306,
    DOLSHARP = 307,
    DO = 308,
    HASHBRACK = 309,
    NOAMP = 310,
    LOCAL = 311,
    MY = 312,
    REQUIRE = 313,
    COLONATTR = 314,
    FORMLBRACK = 315,
    FORMRBRACK = 316,
    SUBLEXSTART = 317,
    SUBLEXEND = 318,
    PREC_LOW = 319,
    OROP = 320,
    DOROP = 321,
    ANDOP = 322,
    NOTOP = 323,
    ASSIGNOP = 324,
    OROR = 325,
    DORDOR = 326,
    ANDAND = 327,
    BITOROP = 328,
    BITANDOP = 329,
    CHEQOP = 330,
    NCEQOP = 331,
    CHRELOP = 332,
    NCRELOP = 333,
    SHIFTOP = 334,
    MATCHOP = 335,
    UMINUS = 336,
    REFGEN = 337,
    POWOP = 338,
    PREINC = 339,
    PREDEC = 340,
    POSTINC = 341,
    POSTDEC = 342,
    POSTJOIN = 343,
    ARROW = 344
  };
#endif

/* Value type.  */
#ifdef PERL_IN_TOKE_C
static bool
S_is_opval_token(int type) {
    switch (type) {
    case BAREWORD:
    case FUNC0OP:
    case FUNC0SUB:
    case FUNCMETH:
    case LABEL:
    case LSTOPSUB:
    case METHOD:
    case PLUGEXPR:
    case PLUGSTMT:
    case PMFUNC:
    case PRIVATEREF:
    case QWLIST:
    case THING:
    case UNIOPSUB:
	return 1;
    }
    return 0;
}
#endif /* PERL_IN_TOKE_C */
#endif /* PERL_CORE */
#if ! defined YYSTYPE && ! defined YYSTYPE_IS_DECLARED

union YYSTYPE
{

    I32	ival; /* __DEFAULT__ (marker for regen_perly.pl;
				must always be 1st union member) */
    char *pval;
    OP *opval;
    GV *gvval;

};

typedef union YYSTYPE YYSTYPE;
# define YYSTYPE_IS_TRIVIAL 1
# define YYSTYPE_IS_DECLARED 1
#endif



int yyparse (void);


/* Generated from:
 * e5b801fdebce5c77dd8e644fc5a489cbea6af33db180e771dd9d669b12bbe0cf perly.y
 * 0947213b55d0ed11693554bea04987e886cf285f5c14cf9075fa1e7acc3f4061 regen_perly.pl
 * ex: set ro: */
