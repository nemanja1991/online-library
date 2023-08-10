<?php
  
namespace App\Enums;
 
enum UserTypeEnum:string {
    case Librarian  = 'librarian';
    case Reader     = 'reader';
}