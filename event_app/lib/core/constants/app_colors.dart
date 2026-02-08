import 'package:flutter/material.dart';

class AppColors {
  // Primary Gradient
  static const Color primaryPurple = Color(0xFF8E2DE2);
  static const Color primaryBlue = Color(0xFF4A00E0);
  
  static const LinearGradient primaryGradient = LinearGradient(
    colors: [primaryPurple, primaryBlue],
    begin: Alignment.topLeft,
    end: Alignment.bottomRight,
  );

  // Backgrounds
  static const Color backgroundDark = Color(0xFF121212);
  static const Color cardDark = Color(0xFF1E1E1E);
  
  // Text
  static const Color textWhite = Color(0xFFFFFFFF);
  static const Color textGrey = Color(0xFFB3B3B3);
  
  // Glass
  static const Color glassWhite = Color(0x1AFFFFFF); // 10% opacity
  static const Color glassBorder = Color(0x33FFFFFF); // 20% opacity
  
  // Functional
  static const Color error = Color(0xFFCF6679);
  static const Color success = Color(0xFF00C853);
}
